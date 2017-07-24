import java.io.*;

public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        TestBenchmark t1 = new TestBenchmark(0);
        t1.start();
        
        TestBenchmark t2 = new TestBenchmark(1);
        t2.start();
        
        TestBenchmark t3 = new TestBenchmark(2);
        t3.start();
        
        // -------------------- Export Results
        
        // ---------- Runtime
        
        String data = "\"chart\":{\"caption\":\"Runtime\",\"theme\":\"ocean\"},\"data\":[
        data += t1.getBenchmark().getRuntime() + ",";
        data += t2.getBenchmark().getRuntime() + ",";
        data += t3.getBenchmark().getRuntime() + "]}";
        
        FileWriter f = new FileWriter("runtime.json", false);
        PrintWriter p = new PrintWriter(f);
        
        p.print(data);
        p.close();
        
        // ---------- Memory Usage
        
        String data = "\"chart\":{\"caption\":\"Memory Usage\",\"theme\":\"ocean\"},\"data\":[
        data += t1.getBenchmark().getMemoryUsage() + ",";
        data += t2.getBenchmark().getMemoryUsage() + ",";
        data += t3.getBenchmark().getMemoryUsage() + "]}";
        
        FileWriter f = new FileWriter("memoryUsage.json", false);
        PrintWriter p = new PrintWriter(f);
        
        p.print(data);
        p.close();
        
        // ---------- CPU Load
        
        String data = "\"chart\":{\"caption\":\"CPU Load\",\"theme\":\"ocean\"},\"data\":[
        data += t1.getBenchmark().getCPULoad() + ",";
        data += t2.getBenchmark().getCPULoad() + ",";
        data += t3.getBenchmark().getCPULoad() + "]}";
        
        FileWriter f = new FileWriter("CPULoad.json", false);
        PrintWriter p = new PrintWriter(f);
        
        p.print(data);
        p.close();
    }
}
