class Solution {
public:
    string decodeString(string s) 
    {
        stack<int> digit;
        stack<string> str;

        string s1="";
        int num=0;
        for(int i=0;i<s.size();i++)
        {
            if(isdigit(s[i]))
            {
                num=num*10+(s[i]-'0');
            }
            else if(s[i]=='[')
            {
                digit.push(num);
                str.push(s1);

                num=0;
                s1="";
            }
            else if(s[i]==']')
            {
                int n=digit.top();
                digit.pop();

                string old=str.top();
                str.pop();

                for(int j=0;j<n;j++)
                {
                    old+=s1;
                }
                s1=old;
            }
            else
            {
                s1+=s[i];
            }
        }
        return s1;
    }
};
