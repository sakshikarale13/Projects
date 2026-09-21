class Solution {
public:
    int findPoisonedDuration(vector<int>& timeSeries, int duration) 
    {
        queue<int> q;
        int count =0;
        for(int i=0;i < timeSeries.size();i++)
        {
            q.push(timeSeries[i]);
            if(i+1 == timeSeries.size())
            {
                count += duration;
            }
            else if((timeSeries[i]+duration -1) < (timeSeries[i+1]))
            {
                count += duration;
            }
            else
            {
                count += timeSeries[i+1] - timeSeries[i];
            }
        }
        return count;

    }
};
