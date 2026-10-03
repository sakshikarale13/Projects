class Solution {
public:
    int countStudents(vector<int>& students, vector<int>& sandwiches) 
    {
        stack<int> stk;
        queue<int> q;
        int n =sandwiches.size(),count=0;
        for(int i=n-1;i>=0;i--)
        {
            stk.push(sandwiches[i]);
        }
        for(int i=0;i<students.size();i++)
        {
            q.push(students[i]);
        }
        
        while(!q.empty() && !stk.empty())
        {
            if(q.front()==stk.top())
            {
                q.pop();
                stk.pop();
                count =0;
            }
            else
            {
                q.push(q.front());
                q.pop();
                count++;
            }
            if(count==q.size())
            {
                break;
            }
        }
        return q.size();
    }
};
