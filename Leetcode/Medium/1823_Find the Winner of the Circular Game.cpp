class Solution {
public:
    int findTheWinner(int n, int k) 
    {
        vector<int> q;
        int index = 0;
        for(int i=1;i<=n;i++)
        {
            q.push_back(i);
        }
        while(q.size() > 1)
        {
            index = (index + k -1) % q.size();
            q.erase(q.begin()+index);
        }
        return q[0];
    }
};
