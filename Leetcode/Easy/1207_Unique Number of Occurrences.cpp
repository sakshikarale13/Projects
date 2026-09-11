class Solution {
public:
    bool uniqueOccurrences(vector<int>& arr) 
    {
        int count=0;
        map<int, int> freq;
        for(int i=0;i<arr.size();i++)
        {
            freq[arr[i]]++;
        }

        set<int> s;
        for(auto x : freq)
        {
            if(s.find(x.second) != s.end())  // end()= not found
            {
                return false;
            }
            s.insert(x.second);
        }
        return true;
        
    }
};
