class Solution {
public:
    void moveZeroes(vector<int>& nums) 
    {
         bool flag = true;
        while(flag)
        {
            flag=false;
            for(int i=0;i<nums.size()-1;i++)
            {
                if(nums[i]==0 && nums[i+1]!=0)
                {
                    int temp=nums[i];
                    nums[i]=nums[i+1];
                    nums[i+1]=temp;
                    flag=true;
                }
            }
            
        }
        
    }
};
