class Solution {
public:
    int longestSubarray(vector<int>& nums) 
    {
        int left=0, right=0,maxLen=0, len=0, zeros=0;

        while(right< nums.size())
        {
            if(nums[right]==0)
            {
                zeros++;
            }
            while(zeros > 1)
            {
                if(nums[left]==0)
                {
                    zeros--;
                }
                left++;
            }
            if(zeros <= 1)
            {
                len = right - left;
                maxLen = max(maxLen, len);
            }
            right++;
        }
        return maxLen;
    }
};
