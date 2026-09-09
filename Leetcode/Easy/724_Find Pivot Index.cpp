class Solution {
public:
    int pivotIndex(vector<int>& nums) 
    {
        int pivot=0, n=nums.size();
        while(pivot < nums.size())
        {
            int suffix=0, prefix=0;
            for(int i=0;i<pivot;i++)
            {
                prefix = prefix+ nums[i];
            }

            for(int j=pivot+1;j<n;j++)
            {
                suffix = suffix + nums[j];
            }

            if(prefix == suffix)
            {
                return pivot;
            }
            
            pivot++;
        }
       return -1;
    }
};
