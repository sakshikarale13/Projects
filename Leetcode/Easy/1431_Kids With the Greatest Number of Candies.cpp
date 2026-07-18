class Solution {
public:
    vector<bool> kidsWithCandies(vector<int>& candies, int extraCandies) 
    {
        vector<bool> result;
        for(int i=0; i<candies.size();i++)
        {
            int flag=0;
            for(int j=0;j<candies.size();j++)
            {
                if(candies[i]+extraCandies >= candies[j])
                {
                    flag = 1;
                }
                else
                {
                    flag = 0;
                    break;
                }
            }
            if(flag==1)
            {
                result.push_back(true);
            }
            else
            {
                
                result.push_back(false);
            }
        }
        return result;
    }
};
