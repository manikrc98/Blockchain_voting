//Main Code
function call()
{
    Web3 = require('web3');
    web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
    web3.eth.accounts;
    fs = require('fs');
    code = fs.readFileSync('Voting.sol').toString();
    solc = require('solc');
    compiledCode = solc.compile(code);
    abiDefinition = JSON.parse(compiledCode.contracts[':Voting'].interface);
    VotingContract = web3.eth.contract(abiDefinition);
    byteCode = compiledCode.contracts[':Voting'].bytecode;
    deployedContract = VotingContract.new(['Rama','Nick','Jose'],{data: byteCode, from: web3.eth.accounts[0], gas: 4700000});
    // console.log("Address is:");
    var waitTill = new Date(new Date().getTime() + seconds * 1000);
    while(waitTill > new Date()){}
    deployedContract.address;
    
    // console.log(address);
    // contractInstance = VotingContract.at(deployedContract.address);  
    // const name = 'Will Robinson';
    // console.warn(`Danger ${name}! Danger!`);  
}		
function call2()
{
    var a = call();
    console.log(a.deployedContract);
}		

// call()
call2()

// contractInstance = VotingContract.at(deployedContract.address)

// contractInstance.totalVotesFor.call('Rama')

// contractInstance.voteForCandidate('Rama', {from: web3.eth.accounts[0]})

// contractInstance.voteForCandidate('Rama', {from: web3.eth.accounts[0]})
