import java.io.*;

public class tester1 { public static String algoName = "fibonacci";


	public static void main(String[] args) {
		String name = args[0];
		try {
			InputStream is = new FileInputStream(name);
			BufferedReader br = new BufferedReader(new InputStreamReader(is));
			int n = Integer.parseInt(br.readLine());
	
			if (n <= 2)
				return;
			long a = 1, b = 1, c;
			for (int k = 0; k < n - 2; ++k) {
				c = a + b;
				b = a;
				a = c;
			}
		} catch (Exception e) {}
	}
}
