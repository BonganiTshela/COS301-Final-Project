import java.io.*;

public class Primer {
    
    public static void main(String[] args) throws IOException {
        File[] files = new File("uploaded").listFiles();
        int count = 0, MAX_ALGORITHMS = 10;
        for (File file : files) {
            if (file.isFile() && MAX_ALGORITHMS > count) {
                String fname = file.getName();
                if (fname.substring(fname.length() - 5).equals(".java")) {
                    InputStream is = new FileInputStream("uploaded/" + fname);
                    BufferedReader b = new BufferedReader(new InputStreamReader(is));
                    String line = b.readLine();
                    StringBuilder sb = new StringBuilder();
                    while (line != null) {
                        sb.append(line).append("\n");
                        line = b.readLine();
                    }
                    
                    count++;
                    String cname = fname.substring(0, fname.length() - 5);
                    String fileContents = sb.toString();
                    fileContents = fileContents.replaceFirst("class " + cname, "class tester" + count);
                    int cpos = fileContents.indexOf("{");
                    String strA = fileContents.substring(0, cpos + 1),
                        strC = fileContents.substring(cpos + 1),
                        strB = " public static String algoName = \"" + cname + "\";\n";
                    fileContents = strA + strB + strC;
                    
                    
                    BufferedWriter w = new BufferedWriter(new FileWriter("benchmarking/tester" + count + ".java"));
                    w.write(fileContents);
                    w.close();
                }
            }
        }
		System.out.println(count);
    }
    
}
