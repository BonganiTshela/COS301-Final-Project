public class Factorial {
    static long recursive(int number) {
        switch (number) {
            case 0:     return 0;
            default:    return (number * recursive(number - 1));
        }
    }
    
    static long iterative(int number) {
        long result = 1;
        for (int i = number; i > 0; i--) {
            result *= i;
        }
        return result;
    }
    
    static long iterativeObjects(int number) {
        Long result = 1L;
        for (Integer i = number; i > 0; i--) {
            result *= i;
        }
        return result;
    }
}