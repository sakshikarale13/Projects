class Solution {
public:
    string gcdOfStrings(string str1, string str2) 
    {
        int size1=str1.size();
        int size2=str2.size();
        if(str1 + str2 != str2 + str1)   
        {
            return "";
        }
        while(size2 !=0)
        {
            int temp = size2;                  
            size2 = size1 % size2;              
            size1 = temp;                       
        }
        
        return str1.substr(0,size1); 
    }
};
