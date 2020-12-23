package wayto;

public class Test {
    public static void main(String args[]) {
        while (true) {
            System.out.println(System.currentTimeMillis() / 1000L);
            try {
                Thread.sleep(1000);
            } catch (InterruptException e) {
                break;
            }
        }
    }
}
