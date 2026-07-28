class Solution {
public:
    string reverseWords(string s) 
    {
        int i=0,j=0;
        while(j<s.size())
        {
            while(j<s.size() && s[j]==' ')
            {
                j++;
            }
            while(j<s.size() && s[j] !=' ')
            {
                s[i]=s[j];
                i++;
                j++;
            }
            while(j<s.size() && s[j]==' ')
            {
                j++;
            }
            if(j<s.size())
            {
                s[i]=' ';
                i++;
            }
        }
        s.resize(i);
        reverse(s.begin(),s.end());

        int start=0;
        for(int end=0;end<=s.size();end++)
        {
            if(end==s.size() || s[end]==' ')
            {
            reverse(s.begin()+start,s.begin()+end);
            start=end+1;
            }
        }

        return s;

    }
};
