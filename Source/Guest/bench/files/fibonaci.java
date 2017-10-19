import java.util.ArrayList;

/**
 * Created by admin on 2017/07/14.
 */
public class fibonaci {

    static int n1=0,n2=1,n3=0;
    static ArrayList arr = new ArrayList();

    static void fibonaci(int count){
        if(count>0){
            n3 = n1 + n2;
            n1 = n2;
            n2 = n3;
           
            arr.add(n3);
            fibonaci(count-1);
        }
    }
}
