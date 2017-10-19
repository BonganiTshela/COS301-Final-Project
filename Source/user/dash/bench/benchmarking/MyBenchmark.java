import com.sun.management.OperatingSystemMXBean;
import java.lang.management.ManagementFactory;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;

public class MyBenchmark {
    private int type;
    private String name;
    private long runTime;
    private double memUsed;
    private int processors;
    private double load;
    
    public MyBenchmark() {
        type = 0;
    }
    
    public MyBenchmark(int t) {
        type = t;
    }
    
    public void timeMyOperation(int reps) {

        OperatingSystemMXBean os = (OperatingSystemMXBean) ManagementFactory.getOperatingSystemMXBean();
        
        double beforeLoad = os.getProcessCpuLoad();
        
        long startTime = System.currentTimeMillis();

        double startMem = Runtime.getRuntime().totalMemory()-Runtime.getRuntime().freeMemory();

        for (int k = 0; k < 1000000; k++)
            switch (type) {
                case 1 : 
                    tester.tester();
                    name = "Tester";
                    break;

                case 2 :
                    tester1.tester1();
                    name = "Tester1";
                    break;

               /* case 3 :
                    tester2.tester2();
                    name = "Tester2";
                    break;

                case 4:
                    tester3.tester3();
                    name="Tester3"
                    break;*/

                default:
                    tester2.tester2();
                    name = "Tester2";
                    break;
            }
        
        long endTime = System.currentTimeMillis();
        double endMem = Runtime.getRuntime().totalMemory()-Runtime.getRuntime().freeMemory();
        double afterLoad = os.getProcessCpuLoad();
        
        runTime = endTime - startTime;
        memUsed = endMem - startMem;
        processors = Runtime.getRuntime().availableProcessors();
        load = afterLoad - beforeLoad;
        
    //System.out.println("what the hell is going on");
    }

    public int numOfFile(){

        /*File folder = new File("C:/xampp/htdocs/benchmarking/guest/bench/temp");
        File[] listOfFiles = folder.listFiles();
        int num=0;

        for (int i = 0; i < listOfFiles.length; i++) {
            if (listOfFiles[i].isFile()) {
                //System.out.println("Files are: ");
                if(listOfFiles[i].getName().contains("tester")){
                    ++num;
                        
                }
            }
        }*/
      return 0;
    }
    public void connectDB() {

        try {
            Class.forName("com.mysql.jdbc.Driver");

            Connection con= DriverManager.getConnection("jdbc:mysql://localhost:3306/final_project","root","");
            Statement stmt=con.createStatement();

            if(runTime<0){
                runTime*=-1;
            }
            if(memUsed<0){
                memUsed*=-1;
            }
            if(load<0){
                load*=-1;
            }
            
            String SQL = "INSERT INTO temp "+
                    "VALUES ('"+name+"','"+runTime+"','"+memUsed+"','"+processors+"','"+load+"')";
            stmt.executeUpdate(SQL);
        }catch (Exception e){

           // System.out.println("something went wrong");
            System.out.println(e);
        }
    }
}