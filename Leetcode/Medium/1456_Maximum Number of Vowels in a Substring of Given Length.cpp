class Solution {
public:
    bool isVowel(char c)
    {
        return c=='a'||c=='e'||c=='i'||c=='o'||c=='u';
    }

    int maxVowels(string s, int k)
    {
        int maxVowels = 0;
        int count = 0;
        int end = k;

        // Count first window
        for(int i = 0; i < k; i++)
        {
            if(isVowel(s[i]))
            {                
                count++;
            }
        }

        maxVowels = count;

    
        for(int start = 0; end < s.size(); start++, end++)
        {
            if(isVowel(s[start]))
            {
                count--;
            }

            if(isVowel(s[end]))
            {
                count++;
            }

            maxVowels = max(maxVowels, count);
        }

        return maxVowels;
    }
};
