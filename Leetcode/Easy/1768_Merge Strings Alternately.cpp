class Solution {
public:
    string mergeAlternately(string word1, string word2) 
    {
        string sb;
        if(word1.size()>=word2.size())
        {
            for(int i=0;i<word1.size();i++)
            {
                if(i < word2.size())
                {
                    sb += word1[i];
                    sb += word2[i];     
                }
                if(i >= word2.size())
                {
                    sb+=word1[i];
                }
            }
            
        }
        if(word1.size()<word2.size())
        {
            for(int i=0;i<word2.size();i++)
            {
                if(i < word1.size())
                {
                    sb += word1[i];
                    sb += word2[i];
                }
                if(i >= word1.size())
                {
                    sb+=word2[i];
                }
            }
            
        }
        
        return sb;
    }
};
