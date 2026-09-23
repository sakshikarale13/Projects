class Solution {
public:
    int mySqrt(int x) 
    {
        if(x==0 || x==1)
        {
            return x;
        }
        for(int i=1;i<=x/2;i++)
        {
            if(i==x/i && i*i == x)
            {
                return i;
            }
            if(i > x/i)
            {
                return i-1;
            }
        }
        return x/2;
    }
};
