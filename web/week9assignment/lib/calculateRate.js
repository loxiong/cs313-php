const rates = require('./rates')

const compare = (a, b) => {
  if (a < b) return -1
  if (a > b) return 1
  return 0
}

const calculateRate = (req, res, next) => {
  const weight = +req.query.weight
  const params = {}
  if (isNaN(weight) || weight <= 0) {
    params.error = 'Invalid weight'
    } else {
    const type = req.query.type

    const selectedRates = rates[type]
    const sorted = Object.keys(selectedRates).map(key=>+key).sort(compare)

    const weightClass = sorted.find((cur) => weight <= cur)

    if (weightClass) {
      params.rate = selectedRates[weightClass]
    } else {
      params.error = "Too heavy"
    }
  }


  res.render('pages/results', params)
}

module.exports = calculateRate