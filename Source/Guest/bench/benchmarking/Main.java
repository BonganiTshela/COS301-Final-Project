import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;

public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

       try {
            Class.forName("com.mysql.jdbc.Driver");

            Connection con= DriverManager.getConnection("jdbc:mysql://localhost:3306/final_project","root","");
            Statement stmt=con.createStatement();
            String s="DELETE FROM temp";
            stmt.executeUpdate(s);

        }catch (Exception e){

            System.out.println("something went wrong");
            System.out.println(e);
        }

        TestBenchmark t1 = new TestBenchmark(0);
        t1.start();
        
        TestBenchmark t2 = new TestBenchmark(1);
        t2.start();
        
        TestBenchmark t3 = new TestBenchmark(2);
        t3.start();

        t1.connect();
        t2.connect();
        t3.connect();
       // System.out.println("done 123456789");
    }
}