<?php

abstract class AbstractTest
{
    /**
     * Run test cases.
     */
    public static abstract function run();

    /**
     * Check whether two variables are equal or not and print the test result.
     * 
     * @param string $call called function
     * @param mixed $var1
     * @param mixed $var2
     * @return void
     */
    public static function assertEqual($call, $var1, $var2): void
    {
        $res = ($var1 === $var2 ? 'PASSED' : 'FAILED');
        printf("called test case: $call, test result: $res <br>");
    }
}
