import java.io.*;

public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws IOException {
        int numAlgos = Integer.parseInt(args[0]);
        
        String filesPath = "testFiles/", rdata = "", mdata = "", cdata = "";
        MyBenchmark[] mb = new MyBenchmark[numAlgos];
		for (int k = 0; k < numAlgos; k++)
			mb[k] = new MyBenchmark();		
        File[] files = new File(filesPath).listFiles();
        for (int i = 0; i < files.length; i++) {
            rdata = "{\"chart\":{\"caption\":\"Runtime\",\"theme\":\"ocean\"},\"data\":[";
			mdata = "{\"chart\":{\"caption\":\"Memory Usage\",\"theme\":\"ocean\"},\"data\":[";
            cdata = "{\"chart\":{\"caption\":\"CPU Load\",\"theme\":\"ocean\"},\"data\":[";
            for (int k = 0; k < numAlgos; k++) {
                mb[k].benchmark(k + 1, filesPath + files[i].getName());
                
                rdata += mb[k].getRuntime();
                if (k + 1 < numAlgos)
                    rdata += ",";
                else
                    rdata += "]}";
                
                mdata += mb[k].getMemoryUsage();
                if (k + 1 < numAlgos)
                    mdata += ",";
                else
                    mdata += "]}";
                
                cdata += mb[k].getCPULoad();
                if (k + 1 < numAlgos)
                    cdata += ",";
                else
                    cdata += "]}";
            }
                
            FileWriter f = new FileWriter("json/runtime" + (i + 1) + ".json", false);
            PrintWriter p = new PrintWriter(f);

            p.print(rdata);
            p.close();
            
            f = new FileWriter("json/memoryUsage" + (i + 1) + ".json", false);
            p = new PrintWriter(f);

            p.print(mdata);
            p.close();

            f = new FileWriter("json/CPULoad" + (i + 1) + ".json", false);
            p = new PrintWriter(f);

            p.print(cdata);
            p.close();
        }
    }
}
