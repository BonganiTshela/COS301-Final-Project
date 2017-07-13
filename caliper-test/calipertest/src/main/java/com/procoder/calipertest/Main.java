package com.procoder.calipertest;

import com.google.caliper.Benchmark;
import com.google.caliper.Param;
import com.google.caliper.Runner;
//import com.google.caliper.SimpleBenchmark;

/**
 *
 * @author Minal
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //Runner.main(MyBenchmark.class, args);
        TestBenchmark t1 = new TestBenchmark(0, args);
        t1.run();
        
        TestBenchmark t2 = new TestBenchmark(1, args);
        t1.run();
        
        TestBenchmark t3 = new TestBenchmark(2, args);
        t1.run();
    }
    /*
    @Param({"5", "10", "15"}) int number;
    
    @Benchmark
	long recursive(int rep) {
		int number = this.number;
		long dummy = 0; // to avoid optimized out of call to recursive
		for (int i = 0; i < rep; i++) {
			dummy |= Factorial.recursive(number);
		}

		return dummy;
	}

	@Benchmark
	long iterative(int rep) {
		int number = this.number;
		long dummy = 0; // to avoid optimized out of call to recursive
		for (int i = 0; i < rep; i++) {
			dummy |= Factorial.iterative(number);
		}

		return dummy;
	}

	@Benchmark
	long iterativeObjects(int rep) {
		int number = this.number;
		long dummy = 0; // to avoid optimized out of call to recursive
		for (int i = 0; i < rep; i++) {
			dummy |= Factorial.iterativeObjects(number);
		}

		return dummy;
	}
        */
}
