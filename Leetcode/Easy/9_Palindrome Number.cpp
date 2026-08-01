class Solution {
public:
    bool isPalindrome(int x) 
    {
        long original=x,rem,rev=0;
        while(x>0)
        {
            rem=x%10;
            rev = (rev*10)+rem;
            x=x/10;
        }
        if(rev==original)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
};
