// SPDX-License-Identifier: MIT
pragma solidity 0.8.5;

contract PasaportContract {

    string name;
    uint56 numero;
    uint56 totalSupply;
    address owner;
    uint56 i;
    
    address[] consultaArray;
    mapping(address => uint56) public balanceOf;
    mapping(address => bool) public voted;
    mapping(address => bool) public consultaMapping;
    
    //constructor() public { 
    //    name = "Pasaporte Covid";
    //    totalSupply = 100; 
    //    balanceOf[msg.sender] = totalSupply;
    //   owner = msg.sender;
    //}
    
    event Transfer(address indexed _from, address indexed _to, uint256 _value); 
      
    function lengthConsultaArray()public view returns(uint256){         
        return consultaArray.length;     
          
    }
    
    function addConsulta(address[] memory _consulta) public{ 
        require(msg.sender == owner);
        for (i = 0; i < _consulta.length; i++){
            if(consultaMapping [_consulta [i]] != true){
                consultaArray.push (_consulta[i]);   
                (consultaMapping [_consulta[i]] = true); 
            }
        }
    }
    
    function getConsulta() view public returns(address[] memory){ 
        return consultaArray;
    }
    
    function transfer(address _to) private returns (bool success){
          require(balanceOf[msg.sender]> 0); 
          
          balanceOf[msg.sender] -= 1; 
          balanceOf[_to] += 1;
          emit Transfer(msg.sender, _to,  1);
          return true;
    }
    
    function vote (address _from, address _consulta) public returns (bool success){ 
        require(msg.sender == owner);
        require(msg.sender != _from );
        require(msg.sender != _consulta);
        require(voted[_from] != true);
        require(consultaMapping[_consulta] == true);
        require(transfer(_from));
    
        balanceOf[_from] -= 1;
        balanceOf[_consulta] += 1; 
        emit Transfer(_from, _consulta,  1);
        voted[_from] = true; 
        return true;
    }
}