
public class main1 {

    static boolean ispalindrom(String str){
        String original = str;
        StringBuilder sb = new StringBuilder(str);
        sb.reverse();

        if(original.equals(sb.toString())){
            return true;
        }
        return false;
        // return original == sb.toString();

    }

    static String reverse(String str){
        StringBuilder sb = new StringBuilder(str);
        sb.reverse();
        return sb.toString();
    }
    public static void main(String[] args) {
      
        System.out.println(ispalindrom("madam"));
    //    Animal a = new Animal("dog", "bho.bho", "yellow");
    }
}
