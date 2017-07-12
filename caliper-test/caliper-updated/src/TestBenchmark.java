import com.google.caliper.SimpleBenchmark;
import com.google.caliper.Benchmark;
import java.lang.annotation.Annotation;

public class TestBenchmark extends SimpleBenchmark {
    
    @Benchmark
    void buildThreads(int reps) {
        MyBenchmark r = new MyBenchmark("RecursiveThread", reps, "recursive");
        r.start();
        
        MyBenchmark i = new MyBenchmark("IterativeThread", reps, "iterative");
        i.start();
        
        MyBenchmark o = new MyBenchmark("ObjectThread", reps, "objects");
        o.start();
    }

    @Override
    public Class<? extends Annotation> annotationType() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
