class Solution {
public:
    int compress(vector<char>& chars) 
    {
        int count =1;
        vector<char> newchar;
        for(int i=0;i<chars.size();i++)
        {
            newchar.push_back(chars[i]);
        }
        chars.clear();
        for(int i=0;i<newchar.size();i++)
        {
            if(i+1 < newchar.size() && newchar[i]==newchar[i+1])
            {
                count++;      2  
            }
            else
            {
                chars.push_back(newchar[i]);    
                if(count > 1)
                {
                    string s = to_string(count); 
                    for(char c : s) 
                    {
                        chars.push_back(c); 
                    }
                }
                count=1;
            }
            
        }
        return chars.size();
    }
};
