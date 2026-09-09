class Solution {
public:
    int largestAltitude(vector<int>& gain) 
    {
        int right=0, left=0, size = gain.size();
        int sum = 0, maxAlt=0;
        vector <int> arr(size+1);
        
            arr[0]=0;
            arr[1]=gain[0];
            for(int i=1;i<gain.size();i++)
            {
                sum = arr[i] + gain[i];
                arr[i+1] = sum;  
            } 
            maxAlt = *max_element(arr.begin(), arr.end());
           
        return maxAlt;
    }
};
