class Solution {
public:
    bool backspaceCompare(string s, string t) 
    {
        stack<int> stack1;
        stack<int> stack2;
        for(int i=0;i<s.size();i++)
        {
            if(s[i]!='#')
            {
                stack1.push(s[i]);
            }
            else
            {
                if(!stack1.empty())
                {
                    stack1.pop();
                }
            }
        }
        for(int i=0;i<t.size();i++)
        {
            if(t[i]!='#')
            {
                stack2.push(t[i]);
            }
            else
            {
                if(!stack2.empty())
                {
                    stack2.pop();
                }
            }
            
        }
        return stack1==stack2;
    }
};
