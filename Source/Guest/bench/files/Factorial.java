public class Factorial {
    public static long recursive(int number) {
        if (number <= 0) 
            return 0;
        return number * recursive(number - 1);
    }
    
    public static long iterative(int number) {
        long result = 1;
        for (int i = number; i > 0; i--) {
            result *= i;
        }
        return result;
    }
    
    public static long iterativeObjects(int number) {
        Long result = 1L;
        for (Integer i = number; i > 0; i--) {
            result *= i;
        }
        return result;
    }
}