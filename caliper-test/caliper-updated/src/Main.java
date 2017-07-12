import com.google.caliper.Benchmark;
import com.google.caliper.runner.CaliperMain;

public class Main {
    public static void main(String[] args) {
        CaliperMain.main(TestBenchmark.class, args);
    }
}