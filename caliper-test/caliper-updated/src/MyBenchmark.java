public class MyBenchmark implements Runnable {
    private Thread t;
    private String threadName;
    private int iterations;
    private boolean recursive = false;
    private boolean iterative = false;
    
    MyBenchmark(String name, int n, String method) {
        threadName = name;
        iterations = n;
        if (method.equals("recursive")) recursive = true;
        if (method.equals("iterative")) iterative = true;
    }
    
    public void run() {
        if (recursive)
            Factorial.recursive(iterations);
        else if (iterative)
            Factorial.iterative(iterations);
        else
            Factorial.iterativeObjects(iterations);
    }
    
    public void start() {
        if (t == null) {
            t = new Thread(this, threadName);
            t.start();
        }
    }
}
