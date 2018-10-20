import {findIndex} from 'lodash';

export const isValidWeight = (weights, weight, id) => {
  let hasInitial = findIndex(weights, {
    initial: weight.initial
  });

  let hasMax = findIndex(weights, {
    max: weight.max
  });

  if (id !== undefined) {
    if (hasMax === id || hasInitial === id) {
      return true;
    }
  }

  return hasInitial < 0 && hasMax < 0;
};