class Solution {
public:
    int maxArea(vector<int>& height) 
    {
        int left=0;
        int right=height.size()-1;
        int maxwater=0;
        
        for(int i=0;i<height.size();i++)
        {
           int width= right-left;
           int h= min(height[left],height[right]);
           int area = width*h;
           
           maxwater = max(maxwater, area);
           
           if(height[left]<height[right])
           {
               left++;
           }
           else
           {
               right--;
           }
        }
        
        return maxwater;
    }
};
