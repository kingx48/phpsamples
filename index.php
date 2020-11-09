<!DOCTYPE html>
<head><title>Abdul Majeed MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a 4 numbers 
attempts to hash all 4 numbers combinations
to determine the original two characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped 
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $show = 15;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<10; $i++ ) {
        $ch1 = $i;   // The first of two characters

        // Our inner loop Not the use of new variables
        // $j and $ch2 
        for($j=0; $j<10; $j++ ) {
            $ch2 = $j;  // Our second character

            for($k=0; $k<10; $k++ ) {
            $ch3 = $k;  // Our second character

                for($l=0; $l<10; $l++ ) {
                $ch4 = $l;  // Our second character

            // 
                 $try = $ch1.$ch2.$ch3.$ch4;

                 // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }        
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</body>
</html>

