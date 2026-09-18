class Solution {
public:
    bool closeStrings(string word1, string word2) 
    {
        if(word1.length() != word2.length())
        {
            return false;
        }

        vector<int> a1(26,0);
        vector<int> a2(26,0);
        for(int i=0;i<word1.size();i++)
        {
            a1[word1[i]-'a']++;
            a2[word2[i]-'a']++;
        }

        for(int i=0;i<size(a1);i++)
        {
            if((a1[i] > 0) && !( a2[i] > 0))
            {
                return false;
            }
        }

        sort(a1.begin(),a1.end());
        sort(a2.begin(),a2.end());
        if(a1 != a2)
        {
            return false;
        }
        return true;
    }
};
