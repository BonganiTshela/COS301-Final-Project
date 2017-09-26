import java.io.*;

public class tester2 { public static String algoName = "factorial";


	public static void main(String[] args) {
		String name = args[0];
		try {
			InputStream is = new FileInputStream(name);
			BufferedReader br = new BufferedReader(new InputStreamReader(is));
			int n = Integer.parseInt(br.readLine());
		
			long total = 1;
			for (long k = 1; k <= n; k++) {
				total *= k;
			}
		} catch (Exception e) {}
	}
}
