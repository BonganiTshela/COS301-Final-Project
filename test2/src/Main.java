

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
        TestBenchmark t1 = new TestBenchmark(0);
        t1.start();
        
        TestBenchmark t2 = new TestBenchmark(1);
        t1.start();
        
        TestBenchmark t3 = new TestBenchmark(2);
        t1.start();
    }
}