<?php

/*Simple class for SHMOP implementation.

# Warning #

You can write/read only one direction. If you try read and write at the same time you get corrupt data. (Its works like STD in/out)
If you need bi-directional communication create 2 instance of shmop class.
Don't try attach more than one readers or writers for some shmid, you get corrupt data. This class use kludged spinlocks for improve speed, and not real atomic operations. You can add semaphore with flock, but it very slow. (~x3)

Benchmark:

Reads per sec: 6316 Data size per sec: 6.17 gb
*/

########################
# shmopwriter.php
########################
function shmpwriter() {
$blockSize = 1024 * 1024 * 100;
$data = random_bytes($blockSize);

try
{
    $shm = new SHMOP('shmopwriter.php', 'c', 644, $blockSize);

    while(1)
    {
        if(!$shm->canWrite())
            continue;

        $shm->write($data);
    }

    $shm->close();

} catch (Exception $e) {
     echo 'Error: ',  $e->getMessage(), PHP_EOL;
     exit;
}
}
########################

########################
# shmopreader.php
########################
function shmpreader() {
$blockSize = 1024 * 1024 * 100;
$shm = new SHMOP('shmopwriter.php', 'c', 644, $blockSize);
$readsMT = 0;
$readsPS = 0;

while(!$shm->eof())
{
    $times = microtime(true);

    if(($data = $shm->read()) === false)
        continue;

    $readsPS++;
    $readsMT += round(((microtime(true) - $times ) * 1000), 3);
    
    if($readsMT > 1000)
    {
        echo 'Reads per sec: ', $readsPS, ' Data size per sec: ', convert($blockSize * $readsPS), PHP_EOL;
        $readsPS = 0;
        $readsMT = 0;
    }
}
}

function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
########################

########################
# shmop.class.php
########################

class SHMOP
{
    private $shmId;
    private $shmHeaderSize;
    private $shmHeaderOffset;
    private $shmBlockSize;
    private $shmMaxBlockSize;

    function __construct(string $pathname, string $flags, int $mode, int $size)
    {
        $this->shmHeaderSize = strlen($size);
        $this->shmHeaderOffset = $this->shmHeaderSize + 1;
        $this->shmMaxBlockSize = $size;
        $this->shmBlockSize = $size + $this->shmHeaderOffset + 1;

        $this->shmId = shmop_open(ftok($pathname, 's'), $flags, $mode, $this->shmBlockSize);

        if(!$this->shmId)
            throw new Exception('shmop_open error');
    }
    
    function __destruct()
    {
        if(!$this->shmId)
            return;

        $this->close();
    }
    
    public function read()
    {
        // Check SpinLock
        if(shmop_read($this->shmId, 0, 1) === "\0")
            return false;
        
        // Get Header
        $dataSize = (int)shmop_read($this->shmId, 1, $this->shmHeaderSize);

        $data = shmop_read($this->shmId, $this->shmHeaderOffset, $dataSize);
        // release spinlock
        shmop_write($this->shmId, "\0", 0);
        return $data;
    }
    
    public function write(string $data)
    {
        // Check SpinLock
        if(shmop_read($this->shmId, 0, 1) !== "\0")
            return false;

        $dataSize = strlen($data);

        if($dataSize < 1)
            throw new Exception('dataSize < 1');
        
        if($dataSize > $this->shmMaxBlockSize)
            throw new Exception('dataSize > shmMaxBlockSize: '. $this->shmMaxBlockSize);
        
        // pack very slow use kludge
        $dataSize .= "\0";

        // Write Header
        shmop_write($this->shmId, $dataSize, 1);
        // Write Data
        shmop_write($this->shmId, $data, $this->shmHeaderOffset);
        // Write spinlock
        shmop_write($this->shmId, "\1", 0);
        return true;
    }

    public function eof()
    {
        return (shmop_read($this->shmId, 0, 1) === "\2") ? true : false;
    }
    
    public function sendeof()
    {
        // Check SpinLock
        if(shmop_read($this->shmId, 0, 1) !== "\0")
            return false;

        shmop_write($this->shmId, "\2", 0);
        return true;
    }
    
    public function canWrite()
    {
        // Check SpinLock
        return (shmop_read($this->shmId, 0, 1) === "\0") ? true : false;
    }
    
    public function close()
    {
        return @shmop_close($this->shmId);
    }

    private function delete()
    {
        $del = @shmop_delete($this->shmId);

        if($del === false)
            return false;

        return @shmop_close($this->shmId);
    }
}

?>