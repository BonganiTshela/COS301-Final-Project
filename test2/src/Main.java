public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        TestBenchmark t1 = new TestBenchmark(0);
        t1.start();
        
        TestBenchmark t2 = new TestBenchmark(1);
        t2.start();
        
        TestBenchmark t3 = new TestBenchmark(2);
        t3.start();
        
        String json = "{";
        json += t1.toJsonArray() + ",";
        json += t2.toJsonArray() + ",";
        json += t3.toJsonArray() + "}";
        
        System.out.println("\n" + json);
    }
}