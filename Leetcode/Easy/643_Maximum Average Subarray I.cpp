class Solution {
public:
    double findMaxAverage(vector<int>& nums, int k) 
    {
        int sum=0;
        double maxSum = -1e9;

        for(int i=0;i<k;i++)
        {
            sum = sum + nums[i];
        }

        maxSum = sum;
        int start=0, end=k;
        while(end < nums.size())
        {
            sum = sum - nums[start];
            start++;

            sum = sum + nums[end];
            end++; 

            maxSum= max(maxSum,(double) sum);
        }
        return (double)maxSum/k;

    }
};
