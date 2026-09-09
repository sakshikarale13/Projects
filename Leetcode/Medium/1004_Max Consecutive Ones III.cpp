class Solution {
public:
    int longestOnes(vector<int>& nums, int k) 
    {
        int left=0, right=0,len=0, maxLen=0, zeros=0;
        while(right < nums.size())
        {
            if(nums[right]== 0)
            {
                zeros++;
            }
            if(zeros > k)
            {
                if(nums[left]==0)
                {
                    zeros--;
                }
                left++;
            }
            if(zeros <= k)
            {
                len = right - left + 1;
                maxLen = max(maxLen, len);
            }
            right++;
        }
        return maxLen;
    }
};
