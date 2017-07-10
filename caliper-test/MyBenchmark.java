package com.procoder.calipertest;
import com.google.caliper.SimpleBenchmark;

/**
 *
 * @author Minal
 */
public class MyBenchmark extends SimpleBenchmark {
    public void timeMyOperation(int reps) {
        for (int k = 0; k < reps; k++)
            Factorial.recursive(reps);
    }
}
