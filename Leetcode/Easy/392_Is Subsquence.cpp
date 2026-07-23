class Solution {
public:
    bool isSubsequence(string s, string t) 
    {
         int count=0,start=0;
        for(int i=0;i<s.size();i++)
        {
            for(int j=start;j<t.size();j++)
            {
                if(s[i]==t[j])
                {
                    count++;
                    start=j+1;
                    break;
                }
            }
        }
        if(count==s.size())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
};
