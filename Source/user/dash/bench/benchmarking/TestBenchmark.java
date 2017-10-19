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
    
   public void connect(){
        b.connectDB();
    }
}