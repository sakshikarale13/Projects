class Solution {
public:
    bool increasingTriplet(vector<int>& nums) 
    {
       int left=INT_MAX; 
       int mid=INT_MAX;
       int n=nums.size();
       for(int i=0;i<n;i++)
       {
           if(nums[i]<= left)
           {
               left=nums[i];    
           }
           else if(nums[i]<=mid)
           {
               mid=nums[i];      
           }
           else 
           {
               return true;
           }
           
       }
       return false;        
    }
};
