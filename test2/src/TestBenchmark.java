
import com.google.caliper.SimpleBenchmark;
import com.google.caliper.Runner;


public class TestBenchmark implements Runnable{
    private Thread t;
    private MyBenchmark b;
    
    public TestBenchmark(int t) {
        switch (t) {
            case 1: case 2: b = new MyBenchmark(t); break;
            default: b = new MyBenchmark(0); 
        }
        
    }
    
    public void run() {
        b.timeMyOperation(0);
    }
    
    public void start() {
        if (t == null) {
            t = new Thread(this);
        }
        t.run();
    }
    /*
    void buildThreads(int reps) {
        MyBenchmark r = new MyBenchmark("RecursiveThread", reps, "recursive");
        r.start();
        
        MyBenchmark i = new MyBenchmark("IterativeThread", reps, "iterative");
        i.start();
        
        MyBenchmark o = new MyBenchmark("ObjectThread", reps, "objects");
        o.start();
    }
    */
}